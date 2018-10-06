import requests
import sys
from bs4 import BeautifulSoup

def get_codeforces_rating(url):
  source_code = requests.get(url)
  plain_text=source_code.text
  soup = BeautifulSoup(plain_text)
  info=[]
  for link in soup.findAll('span',{'class' : 'user-red'}):
    info.append(link.string)
  print(info[1])

get_codeforces_rating(sys.argv[1])