# Challenge

**Name:** Flag 1: Getting In

**Category:** Architecture and Networking

**Difficulty:** Easy

**Description:**

We have recently been testing a new shared lab environment for all students to use! However, we had some serious security issues and we got hacked! Fortunately, we were able to revert to an older version and **changed the SSH port** so hackers cannot easily get in! We believe our systems are secure, but we have requested that you do a penetration test for us to make sure our systems are secure!

Firstly, can you find the new SSH port? If you do find it you can login using the following credentials, but we doubt that you can find it since it is no longer port 22!

**Username:** student
**Password:** cybernemosynecits1003

**Flag:** CITS1003{i4m_1n_p33p51!1!n0W_2_gIt_mOaR_cR3d5!}

## Solution

* Nmap to find the SSH server running on port 2022

* SSH in using the following command

```
ssh -p 2022 student@<ip address here>
```
