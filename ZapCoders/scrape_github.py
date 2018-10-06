import requests
from bs4 import BeautifulSoup
import sys

def get_github_repositories(url):
  source_code = requests.get(url)
  plain_text=source_code.text
  soup = BeautifulSoup(plain_text)
  str=[]
  for link in soup.findAll('a',{'class':'social-count'}):
    str.append(link.string.replace("\n","").strip())
  print(str[1])

get_github_repositories(sys.argv[1])
