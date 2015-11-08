<?php

namespace SF2wDDD\Common\Model\Base;

final class ObjectCollection implements \Countable
{
    /**
     * Collections's items
     *
     * @var \ArrayObject
     */
    private $items;

    /**
     * Auto-incremental index
     *
     * @var int
     */
    private $currentIndex = -1;

    /**
     * Stores all indexes for collections' items
     *
     * @var array
     */
    private $indexes = array();

    public function __construct(array $itemsList = array())
    {
        $this->items = new \ArrayObject();
        $this->addFromArrayList($itemsList);
    }

    public function count()
    {
        return $this->items->count();
    }

    /**
     * Adds an item to the collection
     *
     * @param mixed $item
     * @param string|int $itemId If null, a numeric index is attributed to the added item
     * @return void
     */
    public function add($item, $itemId = null)
    {
        $this->items->offsetSet($this->resolveNewItemId($itemId), $item);
    }

    /**
     * Returns a read-only array copy of items in the collection
     *
     * @return mixed
     */
    public function arrayList()
    {
        $list = array();
        $iterator = $this->items->getIterator();
        while ($iterator->valid()) {
            $list[$iterator->key()] = clone $iterator->current();
            $iterator->next();
        }
        return $list;
    }

    /**
     * Retrieves the first item of the collection, if it exists.
     *
     * @return mixed
     */
    public function first()
    {
        return $this->items->getIterator()->current();
    }

    /**
     * Returns the collection's item identified by the supplied id OR null
     *
     * @param string|int $itemId
     * @return mixed|null
     */
    public function get($itemId)
    {
        if ($this->items->offsetExists($itemId)) {
            return $this->items->offsetGet($itemId);
        }
        return null;
    }

    /**
     * Checks whether collection is empty
     *
     * @return bool
     */
    public function isEmpty()
    {
        return ($this->count() < 1);
    }

    /**
     * Iterates over each collection's item submitting them through the supplied task.
     *
     * The $task param is a \Closure that receives each collection's <<item key>> and
     * the <<item>> itself as the first and second arguments, respectively.
     *
     * @param callable $task
     * @return void
     */
    public function iterateTask(\Closure $task)
    {
        $iterator = $this->items->getIterator();
        while ($iterator->valid()) {
            $task($iterator->key(), $iterator->current());
            $iterator->next();
        }
    }

    /**
     * Merges supplied items into the current collection
     *
     * @param ObjectCollection $newItems
     * @return void
     */
    public function merge(ObjectCollection $newItems)
    {
        $newItems->iterateTask(function ($itemKey, $item)
        {
            $this->add($item, $itemKey);
        });
    }

    /**
     * Returns a read-only copy of the collection
     *
     * @return ObjectCollection
     */
    public function readOnlyCopy()
    {
        return clone $this;
    }

    /**
     * Removes from collection the item identified by the supplied id
     *
     * @param $itemId
     * @return void
     */
    public function remove($itemId)
    {
        $this->items->offsetUnset($itemId);
        if (isset($this->indexes[$itemId])) {
            unset($this->indexes[$itemId]);
        }
    }

    public function __toArray()
    {
        return $this->arrayList();
    }

    private function addFromArrayList($itemsList)
    {
        foreach ($itemsList as $item) {
            $this->add($item);
        }
    }

    private function resolveNewItemId($itemId)
    {
        if (is_null($itemId)) {
            $itemId = $this->nextIndexForAddItem();
        }
        $this->indexes[] = $itemId;
        return $itemId;
    }

    private function nextIndexForAddItem()
    {
        $this->currentIndex += 1;
        return $this->currentIndex;
    }
}
