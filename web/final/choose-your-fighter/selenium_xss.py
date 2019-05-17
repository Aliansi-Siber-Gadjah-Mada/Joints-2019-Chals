from seleniumrequests import Chrome
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import json
import requests
import time

base_url = 'http://192.168.1.19:50201'
driver = webdriver.Chrome("/mnt/c/Users/cacadosman/Documents/chromedriver.exe")

while True:
    data = {
        "username":"",
        "password":""
    }

    driver.get(base_url  + '/auth/login')
    find_user = driver.find_element_by_css_selector("input[name='username']")
    find_user.send_keys(data['username'])
    find_pass = driver.find_element_by_css_selector("input[name='password']")
    find_pass.send_keys(data['password'])
    find_sbt = driver.find_element_by_css_selector("input[type='submit']")
    find_sbt.click()

    url = []

    time.sleep(2)
    lol = driver.find_elements_by_xpath('//a')
    for i, j in enumerate(lol):
        if i < 2 :
            continue
        href = j.get_attribute('href')
        url.append(href)

    for i in url:
        driver.get(i)
        time.sleep(2)

    driver.get(base_url + '/logout')