#!python
# encoding: utf-8
from cookielib import MozillaCookieJar, CookieJar
from urllib2 import Request, build_opener, HTTPCookieProcessor, urlopen
import httplib, urllib2
 
DEFAULT_HEADERS = {"User-Agent": "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:28.0) Gecko/20100101 Firefox/28.0", "Connection": "keep-alive", "Accept-Encoding":	"gzip, deflate", "Accept-Language": "en-US,en;q=0.5", "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8"}
DEFAULT_TIMEOUT = 360
 
class MyHTTPConnection(httplib.HTTPConnection):
    def send(self, s):
        print s  # or save them, or whatever!
        httplib.HTTPConnection.send(self, s)

class MyHTTPHandler(urllib2.HTTPHandler):
    def http_open(self, req):
        return self.do_open(MyHTTPConnection, req)

def mygrap(url):
    opener = urllib2.build_opener(MyHTTPHandler)
    response = opener.open(url)
    print(response.read().decode("utf8"))
    response.close()

def gen_login_cookie():
    cookie = MozillaCookieJar()
    cookie.load('cookies.txt', ignore_discard=True, ignore_expires=True)
    return cookie
 
 
def grab(cookie, url):
    req = Request(url, headers=DEFAULT_HEADERS)
    opener = build_opener(HTTPCookieProcessor(cookie))
    response = opener.open(req, timeout=DEFAULT_TIMEOUT)
    print(response.read().decode("utf8"))
    response.close()
 
 
def start(url1, url2):
    cookie = gen_login_cookie()
    grab(cookie, url1)
    grab(cookie, url2)
 
 
if __name__ == '__main__':
    mygrap('http://user.qzone.qq.com/214893547/334/')
    u1 = "http://user.qzone.qq.com/214893547/334/"
    u2 = "https://h5.qzone.qq.com/proxy/domain/r.qzone.qq.com/cgi-bin/tfriend/friend_ship_manager.cgi?uin=281379044&do=2&rd=0.44948123599838985&fupdate=1&clean=0&g_tk=515169388"
    start(u1, u2)
