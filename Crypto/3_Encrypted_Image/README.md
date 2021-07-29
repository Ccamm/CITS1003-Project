# Challenge

**Name:** Encrypted Image

**Category:** Cryptography

**Difficulty:** Medium

**Description:**

On a late afternoon working hard as a NSA agent, you see an encrypted image sent between two suspected Kinder Surprise smugglers. After you inspect the communications further, you discover that the sender used AES encryption using the ECB mode to encrypt the image. The original image was a PPM file and had a width and height of 1920 by 1080 pixels respectively. However, you were unable to figure out what was the key used to encrypt the image. Can you still see the hidden message within the image?

**File:** encrypted_image.bin

**Flag:** CITS1003{dont use ECB mode with images or any data really...}

## Solution

* A serious issue using ECB mode with images is that same coloured regions in the image would encrypt to the same ciphertext, revealing the outline of the original image.

* To view the encrypted image, you need to create a PPM header to add in front of the encrypted image.

*header.txt*
```
P6 1920 1080 255
```

```bash
cat header.txt encrypted_image.bin > sol.ppm
```
