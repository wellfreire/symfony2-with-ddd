Symfony2 with DDD
=================

An example of how we can use [**Symfony2**](http://symfony.com/what-is-symfony) and still use a more [**DDD**](http://dddcommunity.org/learning-ddd/what_is_ddd/)-like approach for driving our software layers.

> This is not intended to be a completely functional app. Instead, the code here was extracted from other projects in order to illustrate how we can take advantage of a framework's facilities (here Symfony in particular) and still write a domain-driven code, decoupled from it.

I am considering that you are familiar with Symfony and have already a general understand of what *DDD* is. The question to be answered and exemplified here is: can DDD be applied besides using a framework?

The "problem"
-----------------

Although it could seems obvious, it was not obvious to me when I first came out with that question. After reading [Eric Evans](http://www.amazon.com/Eric-Evans/e/B001KDCO2I) and [Vaughn Vernon](http://www.amazon.com/Implementing-Domain-Driven-Design-Vaughn-Vernon/dp/0321834577/ref=sr_1_3?s=books&ie=UTF8&qid=1447021872&sr=1-3&keywords=vaughn+vernon)'s books, the first time I tried to start a project applying the DDD approach I got frozen by a moment when trying to do that using my favorite framework.

The main 'barrier' I stumbled upon was the need for placing all the code inside bundles' structure and still reach a clean domain-driven code. One could ask why having this doubt, why couldn't we write 'DDD code' using bundles.

In order to get all these things cleared up in mind, I was through a search on the web for people which could have these same doubts. After a few searches I found an [article](http://williamdurand.fr/2013/08/07/ddd-with-symfony2-folder-structure-and-code-first/) written by [William Durand](https://twitter.com/couac), so I realized that I wasn't alone. Due to the lack of people really applying DDD concepts among my network (unfortunately), I guess I am not an once-in-a-million guy with these doubts, so I decided to put and exemplify these ideas here in case it can help someone else.

Yes, there is code beyond bundles
----------------------------------------

One of the misunderstandings in which we all incur when using *Symfony2* is thinking that all the code we write must be put under a *bundle* structure. **Unless we are writing some kind of library/package intended to be distributed for use in third party applications, we do can place code outside bundles**.

At least for me, after reading the DDD books and several other materials on the subject, one of the main concepts that I absorbed was that *DDD-like code is absolutely* **clean** and distilled at most to be as much **semantic** and **business-driven** as possible. However, although we can heavily minimize what is needed to build a bundle, even so it doesn't looks clean for me building the *core* of my *domain model* inside a bundle, for example.

More than being semantic, I guess that **writing all our code inside bundles lead us to more coupling between the real business code and the framework** structure. This coupling can be bad, not because we intend to write decoupled code in order to allow swapping frameworks in the future -- as one could argument when justifying the need for decoupling -- but because we need separate concerns. In this context, one concern is our business code -- which solves our business problem -- and a different one is the need for tools -- provided by a framework -- to improve our productivity and software reliability.

The Solution
---------------

The solution for me was placing only the most necessary and what makes most sense inside bundles. In practice, this translated on building **only my application layer under a bundle structure**  -- considering a layered structure brought from Vaughn Vernon's book ideas and the [hexagonal architecture](http://fideloper.com/hexagonal-architecture). The other base layers -- **domain** and **infrastructure**, along with other ones -- are placed in framework-agnostic folder structures not related to the Symfony's bundle.

This sample project puts together some pieces of code from another project using this approach. If you navigate through the code, from the Controller's action (in the *application* layer), passing through the *domain model* logic down to the *persistence* logic (in the *infrastructure* layer), **the first-class principle applied is that the *application* code (inside a bundle) depends on the layers below, and not the opposite**.

More than that, the code placed in the layers below the application layer do not have Symfony's specific code. In other words, **the influence of the framework itself goes only up the Application layer**.
