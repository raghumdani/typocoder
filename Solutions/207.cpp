#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
using namespace std;
#define LL long long
#define LIMIT 1000000
#define si(n) scanf("%d",&n)


LL np(int n,int p,int MOD){
    if(p==0)
        return 1%MOD;
    if(p==1)
        return n%MOD;
    else if(p==2)
        return (n%MOD*n%MOD)%MOD;
    else{
        LL r=np(n,p/2,MOD)%MOD;
        if(n%2)
            return (n*r*r)%MOD;
        else 
            return (r*r)%MOD;
    }
}


int main() {
    int t;
    si(t);
    while(t--){
        int a,b,c,m;
        si(a);si(b);si(c);si(m);
        printf("%d\n",np(a,np(b,c,m),m));
    }
  return 0;
}
