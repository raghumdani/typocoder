#include<bits/stdc++.h>
using namespace std;

bool prime[1000001];
int primes[1000001];

void sieve()
{
    for(long long int i=2;i<=1000000;i++)
    {
        if(!prime[i])
        {
            for(long long int j=i*i;j<=1000000;j+=i)
            {
                prime[j]=1;
            }
        }
    }
    primes[1]=0;
    for(int i=2;i<=1000000;i++)
    {
        if(!prime[i])primes[i]=primes[i-1]+1;
        else primes[i]=primes[i-1];
    }
}

int main()
{
    //freopen("inp.txt","r",stdin);
    //freopen("out.txt","w",stdout);
    int q,n;
    sieve();
    scanf("%d",&q);
    while(q--)
    {
        scanf("%d",&n);
        printf("%d\n",primes[n]);
    }
    return 0;
}
