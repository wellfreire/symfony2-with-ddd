<?php

namespace SF2wDDD\Common;

use SF2wDDD\Common\Model\Email;

class EmailTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider invalidEmailAddressProvider
     * @expectedException \InvalidArgumentException
     */
    public function testCannotInstantiateWithInvalidAddress($invalidAddress)
    {
        new Email($invalidAddress);
    }

    /**
     * @dataProvider validEmailAddressProvider
     */
    public function testCanInstantiateWithValidAddress($validAddress)
    {
        $validEmail = new Email($validAddress);
        $this->assertEquals(
            $validAddress,
            $validEmail->address(),
            "Should be able to instantiate Email then retrieve correct address."
        );
    }

    public function testItCanProperlyCheckWhetherTwoEmailsAreEqual()
    {
        $firstEmail = new Email("test@domain.com");
        $secondEmail = new Email("test@domain.com");
        $thirdEmail = new Email("test@domain.net");

        $this->assertTrue(
            $firstEmail->equals($secondEmail),
            "Compared emails should be evaluated as being the same."
        );

        $this->assertFalse(
            $firstEmail->equals($thirdEmail),
            "Compared emails should be evaluated as being different."
        );
    }

    public function invalidEmailAddressProvider()
    {
        return [
            [null],
            [""],
            ["invalid"],
            ["@"],
            ["invalid@"],
            ["invalid@domain"],
            ["invalid@domain."],
            ["@domain.com"],
        ];
    }

    public function validEmailAddressProvider()
    {
        return [
            ["valid@email.com"],
            ["valid@email.com.br"],
            ["valid@email.net"],
            ["v@e.n"],
        ];
    }
}
