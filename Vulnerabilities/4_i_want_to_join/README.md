# I Want To Join

**Description:** Can you join the Anti Pineapple on Pizza Society, even though their sign up form has been disabled?

**Flag:** CTF{n3v3R_tRv5t_d3_cL1eNt5_111!11}

## Solution

* Only the submit button is disabled on the HTML form. You can easily remove the disabled attribute using Inspect Element on a browser or directly sending a POST request to the index page.

* Example curl command

```bash
curl -XPOST -d "email=test@test.com" http://localhost:1337/index.php
```
