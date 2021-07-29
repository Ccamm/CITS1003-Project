#!/bin/bash

docker build -t ping-of-death . && \
docker run -it -p 1337:1337 --rm --name ping-of-death-container ping-of-death
