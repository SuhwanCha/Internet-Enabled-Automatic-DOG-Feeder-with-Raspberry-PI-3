# http://ljs93kr.tistory.com/40
import RPi.GPIO as GPIO
import time

pin = 18 # PWM pin num 18
GPIO.setmode(GPIO.BCM)
GPIO.setup(pin, GPIO.OUT)
p = GPIO.PWM(pin, 50)
p.start(0)
cnt = 0
try:
    p.ChangeDutyCycle(1)
    time.sleep(3)
    p.stop()
except KeyboardInterrupt:
    p.stop()
GPIO.cleanup()
