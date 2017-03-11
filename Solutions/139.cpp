#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#define ll long long

using namespace std;

vector<ll int> PRIME;
int RECENT_PRIME=0;

int prime_init(long long int n);

int main()
{
    prime_init(100001);

    ll int n,num;
    scanf("%lld",&n);

    for(ll int i=0;i<n;i++)
    {
        scanf("%lld",&num);
        printf("%lld",SUM[num]);
    }
}

int prime_init(long long int n)
{
    if(RECENT_PRIME>n)
        return 1;
    PRIME.assign(n,1);
    PRIME[0]=PRIME[1]=0;
    PRIME[2]=1;
    for(long long int i=4;i<=n;i+=2)
        PRIME[i]=0;
    for(long long int i=3;i<=sqrt(n);i+=2)
    {
        if(PRIME[i])
        {
            for(long long int j=i*i;j<=n;j+=i)
                PRIME[j]=0;
        }
    }
    RECENT_PRIME=n;
    return 1;
}