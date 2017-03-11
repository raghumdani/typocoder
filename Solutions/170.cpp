#include<iostream>
#include<stdio.h>
using namespace std;

int i,t,a,b,c,m,r;

int power(int a, int b) {
  int res = 1;
  while(b > 0) {
    if(b & 1) res = (res * 1LL * a) % m;
    a = (a * 1LL * a) % m;
    b /= 2;
  }
  return res;
}
int main()
{

cin>>t;
for(i=0;i<t;++i)
{
cin>>a>>b>>c>>m;
//cout<<m<<"\n";
r=(power(a,power(b,c)))%m;
cout<<r<<"\n";
}
return 0;
}
