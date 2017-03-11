#include<bits/stdc++.h>
using namespace std;
int main()
{
    long n;
    cin>>n;
    int a[n],b[n],c[n];
    long i;
    for(i=0;i<n;++i)
        cin>>a[i];
    long s1;
    b[0]=a[0];
    s1=b[0];
    for(i=1;i<n;++i)
        {
            b[i]=b[i-1]+a[i];
            s1+=b[i];
 
        }
 
     long s2;
     sort(a,a+n);
     c[0]=a[0];
     s2=c[0];
     for(i=1;i<n;++i)
        {
            c[i]=c[i-1]+a[i];
            s2+=c[i];
 
        }
 
     cout<<s1-s2;
 
 return 0;
 
}