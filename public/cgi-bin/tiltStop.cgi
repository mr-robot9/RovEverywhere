#!/usr/bin/python
import sys
import pigpio
import RPi.GPIO as GPIO
import time
import os
GPIO.setwarnings(False)
GPIO.cleanup()
GPIO.setmode(GPIO.BCM)

servo = 2

GPIO.setup(servo,GPIO.OUT)
Pservo = GPIO.PWM(servo, 100)
try:
	Pservo.ChangeDutyCycle(0)
finally:
	GPIO.cleanup()
