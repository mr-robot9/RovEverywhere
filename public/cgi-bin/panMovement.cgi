#!/usr/bin/python
import sys
import pigpio
import RPi.GPIO as GPIO
import time
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

servo = 3

freq=int(sys.argv[1])

pi = pigpio.pi()
pi.set_mode(servo, pigpio.OUTPUT)
print("Moving to the middle  using 1500...")
pi.set_servo_pulsewidth(servo, freq)


GPIO.cleanup()
