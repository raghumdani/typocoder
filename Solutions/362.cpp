#include <bits/stdc++.h> 
using namespace std;
int main() { 
int i,j,k,m,n,t,l,a[100007],b[100007],x;
cin>>t;
while(t--)
{
    cin>>n>>k;
    k*=2;
    m=0;
    for(i=0;i<100007;i++)
    {
        b[i]=0;
    }
    for(i=0;i<n;i++)
    {
        cin>>a[i];
    }
    if(k==0)
        {
        k=100000;
    }
    for(j=0;j<n;j++)
    {
        x=a[j]%k;
        b[x]++;
        if(b[x]>m)
        {
            m=b[x];
        }
    }
    cout<<m<<endl;
}
return 0; 
}