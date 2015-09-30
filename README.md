# NornCMS - a very fast CMS

This document introduces NornCMS, and makes an effort to summarize the instructions on deploying it on a specially configured server.

This is an unstable repository and should be treated as an alpha. At this point this repo doesn't contain enough 
code to perform a full deployment. This is work in progress.

## Introduction

Most web deployments such as CRMs, shopping carts, CMS and blog engines, etc. attract and convert users by 
offering an easy on the eye, easy to install turnkey solution that would run out of the box on almost any 
modern server configuration.

This "one-web-app-fits-all-server-configurations" approach, while successful, overlooks a growing area of
resource constrained setups such as embedded devices and VPS. NornCMS is **not device-agnostic**, and that is 
where it gets its edge. 

As much as applications want to be able to utilize resources on a server efficiently, usually the only 
configuration options that are available to admins are those of the CMS, and not of the server. This is 
especially true of shared hosting environments.

We know that there are server configurations that are more advantageous for our purposes, and we know that 
for whatever reasons most setups do not take full advantage of the available hardware and software. This disconnect 
between programming and network administration, makes deployments inflexible, and it introduces weaknesses and blind 
spots causing software to falter in the following:

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


## Discussion

### Running in the cloud

The big shops such as AWS, Rackspace, Google and others offer tools to automatically spawn new server instances to match 
fluctuations in the load, and these tools are just awesome on the enterprise level, but the truth is that most companies 
out there will not need that degree of sophistication and availability to do online business successfully. Consider this ```ab```
test on a $19/year VPS. This was run on an early version of NornCMS, I am expecting to almost double these numbers with 
some optimizations:

```
Document Path:          /
Document Length:        12536 bytes

Concurrency Level:      10
Time taken for tests:   1.057 seconds
Complete requests:      46
Failed requests:        0
Write errors:           0
Total transferred:      591882 bytes
HTML transferred:       576656 bytes
Requests per second:    43.51 [#/sec] (mean)
Time per request:       229.833 [ms] (mean)
Time per request:       22.983 [ms] (mean, across all concurrent requests)
Transfer rate:          546.72 [Kbytes/sec] received
```

Note that according to the above, we can serve 46 requests in just 1 second, processing 10 requests in parallel. That's a 
regular HTML5 page on an OpenVZ VPS. Let's round it up to 50, and ask this - how many companies with a $19/year webserver budget
really need to service 50 pages per second? Even so, we can more than double that if we introduced another VPS (this one at $6/year)
to serve as a load balancer and a cache server.

## NornCMS in the wild

1. http://panoramicawareness.com
2. http://vikinglaws.mx
