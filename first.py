#!/usr/bin/env python3
from PIL import Image
import pytesseract
#import argparse
import cv2
import os
import sys
name_of_file=sys.argv[1]      
#name_of_file="testocr.png"
image = cv2.imread(name_of_file)
#gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
#filename = "{}.png".format(os.getpid())
#cv2.imwrite(filename, gray)
text = pytesseract.image_to_string(Image.open(name_of_file))
#os.remove(filename)
# print(text[:-1])
text = text.replace('\n', '').replace(' ', '')
#print(ord(text[-1]))
while (text[-1]=='\n' or ord(text[-1])==12):
    text = text[:-1]
print(text)

# print("\n")
# print("hey")
# #
# print("hey")

#print("hello world")