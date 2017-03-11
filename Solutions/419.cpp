#include<bits/stdc++.h>
using namespace std;
int main()
{
    int n,i;
    cin>>n;
    long long int a[n+1],b[n+1],sum=0,sum1=0;
    a[0]=0;
    b[0]=0;
    for(i=1;i<=n;i++)
        cin>>a[i];
    for(i=1;i<=n;i++)
    {
        b[i]=b[i-1]+a[i];
        sum1+=b[i];
    }
    sort(a+1,a+n+1);
    for(i=1;i<=n;i++)
    {
        a[i]=a[i-1]+a[i];
        sum+=a[i];
    }
    cout<<sum1-sum;
    return 0;
}