#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
#define ll long long
#define MOD 1000000007
using namespace std;

ll int gcd(ll int a,ll int b);

int main()
{
    ll int mul=1,arr[10005],n,n1,ans;

    cin>>n;
    for(ll int i=0;i<n;i++)
    {
        cin>>n1;
        for(ll int j=0;j<n1;j++)
        {
            scanf("%ld",&arr[j]);
            mul*=arr[j];
            mul%=MOD;
        }
        for(ll int j=0;j<n1;j++)
        {
            arr[j]=gcd(mul/arr[j],arr[j]);
        }
        ans=arr[0];
        for(ll int j=1;j<n1;j++)
        {
            if(arr[j]>ans)
                ans=arr[j];
        }
        printf("%ld\n",ans);
    }
    return 1;
}

ll int gcd(ll int a,ll int b)
{
    while(a!=0&&b!=0&&a!=b)
    {
        if(a>=b)
            a=a%b;
        else
            b=b%a;
    }
    if(a==0)
        return b;
    else
        return a;
}