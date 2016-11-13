import RPi.GPIO as gpio
import time
import os
import sys
#from urllib.request import urlopen, quote


gpio.setmode(gpio.BCM)

trig = 13
echo = 19


print "start"
gpio.setup(trig, gpio.OUT)
gpio.setup(echo, gpio.IN)


try :
 while True :
     gpio.output(trig, False)
    #  print "Waiting..."
     time.sleep(2)

     gpio.output(trig, True)
     time.sleep(0.00001)
     gpio.output(trig, False)

     while gpio.input(echo) == 0 :
         pulse_start = time.time()
     while gpio.input(echo) == 1 :
         pulse_end = time.time()
         pulse_duration = pulse_end - pulse_start
         distance = pulse_duration * 17000
         distance = round(distance, 2)
#         print "Distance : ", distance, "cm" 
     if distance < 30 and distance > 10 :
#	 urlopen('https://home.gdb.kr/add');
         os.system("python ./motor.py")
except :
    gpio.cleanup()

