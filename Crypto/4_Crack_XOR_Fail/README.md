# Challenge

**Name:** Crack XOR Fail

**Category:** Cryptography

**Difficulty:** Hard

**Description:**

Can you recover the original plaintext that was encrypted using XOR with a key 8 bytes long? The ciphertext is encoded as hex values and the plaintext is in the format **CITS1003{ ... }**.

```
2a4d748d9c8edf33126710eee1e1844e06534e81ddd2db31075013a6f9e1db541d50419dc6e1de325b2501e1d0
```

**Challenge Files:** hex_cipher.txt

**Flag:** CITS1003{c00L_kNoWn_pl41nT3xT_4TtTaCk_122!!?}

## Solution

* Since we know the first 8 bytes of the message are `CITS1003`, we can recover the XOR key by the known plaintext `CITS1003` with the encrypted message.

  * Recovers the hex values of the XOR key: https://gchq.github.io/CyberChef/#recipe=From_Hex('Auto')XOR(%7B'option':'UTF8','string':'CITS1003'%7D,'Standard',false)To_Hex('None',0)&input=MmE0ZDc0OGQ5YzhlZGYzMw

* Using the recovered key we can then decrypt the rest of the message and get the flag.

  * Recovers the flag: https://gchq.github.io/CyberChef/#recipe=From_Hex('Auto')XOR(%7B'option':'Hex','string':'690420deadbeef00'%7D,'Standard',false)&input=MmE0ZDc0OGQ5YzhlZGYzMzEyNjcxMGVlZTFlMTg0NGUwNjUzNGU4MWRkZDJkYjMxMDc1MDEzYTZmOWUxZGI1NDFkNTA0MTlkYzZlMWRlMzI1YjI1MDFlMWQw
