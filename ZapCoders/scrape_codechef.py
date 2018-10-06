import requests
from bs4 import BeautifulSoup
import sys

def get_codechef_rating(url):
  source_code = requests.get(url)
  plain_text=source_code.text
  soup = BeautifulSoup(plain_text)
  info=[]
  for link in soup.findAll('div',{'class' : 'rating-number'}):
    info.append(link.string)
  print(info[0])

  get_codechef_rating(sys.argv[1])