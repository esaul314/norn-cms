# NornCMS - a very fast CMS

This document introduces NornCMS, and makes an effort to summarize the instructions on deploying it on a specially configured server.

This is an unstable repository and should be treated as an alpha.

## Introduction

Most web deployments such as CRMs, shopping carts, CMS and blog engines, etc. attract and convert users by 
offering an easy on the eye, easy to install turnkey solution that would run out of the box on almost any 
modern server configuration.

This "one-web-app-fits-all-server-configurations" approach, while successful, overlooks a growing area of
resource constrained setups such as embedded devices and VPS. NornCMS is **not device-agnostic**, and that is 
where it gets its edge. 

In most organizations, programmers and network admins do not confer with each other much, each often taking
pride in not knowing nor caring about the other's work. Hardware agnostic code is, in fact, often a source 
of pride for a programmer, just the same as a network admin would be proud to have an OS that can handle
anything the programmers may throw at it.

Because of this disconnect between programmers and network admins, most pieces of software tend to falter 
in the following:

1. not integrated with other tools;
2. not aware of resources or lack thereof;
3. assume that hardware is cheap and expendable;

## What makes NornCMS so fast

In most settings access to disk I/O is expensive, often prohibitively slow. NornCMS minimizes I/Os by 
integrating a multi-layered cache, and keeping all data in memory, even if the data have to be compressed.

Making use of ```/dev/shm``` RAM disk takes care of whatever reads/writes were not covered by ```memcached``` and
```MariaDB``` caching settings.

A rather common setting in the ```nginx``` configuration lets us serve up cached content without processing **any** PHP
code thus making the CMS even faster.

Last, but not least, NornCMS integrates with the reverse proxy ```varnish``` in the way that offsets most of the 
load onto the ridiculously fast proxy, with the CMS itself only having to process very infrequent POSTs and rare 
cache-refresh requests.

## Configuration

This is coming up soon. As you may imagine this is the longest and the most complex part.


## NornCMS in the wild

1. http://panoramicawareness.com
2. http://vikinglaws.mx
