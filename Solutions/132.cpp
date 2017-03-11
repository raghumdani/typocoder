#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#define ll long long

using namespace std;

vector<ll int> PRIME;
vector<int> SUM;
int RECENT_PRIME=0;

int prime_init(long long int n);

int main()
{
    prime_init(1000001);

    ll int n,num;
    cin>>n;

    for(ll int i=0;i<n;i++)
    {
        cin>>num;
        cout<<SUM[num]<<endl;
    }
}

int prime_init(long long int n)
{
    if(RECENT_PRIME>n)
        return 1;
    PRIME.assign(n,1);
    SUM.assign(n,0);
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
    SUM[0]=0;
    SUM[1]=0;
    for(long long int i=2;i<=n;i++)
        SUM[i]=SUM[i-1]+PRIME[i];
    RECENT_PRIME=n;
    return 1;
}