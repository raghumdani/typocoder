#include <bits/stdc++.h>
using namespace std;

bool prime[4000000];
void Sieve(long long n)
{
    memset(prime, true, sizeof(prime));
 
    for (long long p=2;p*p<=n;p++)
    {
        if (prime[p]==true)
        {
            for (long long i=p*2;i<=n;i += p)
                prime[i]=false;
        }
    }
}

int main() {
    long long t;
    scanf("%lld",&t);
    Sieve(1000001);
    long long ans[1000001]={0};
    for(long long i=2;i<1000001;i++)
    {
        if(prime[i])
        ans[i]=ans[i-1]+1;
        else
        ans[i]=ans[i-1];
    }
    while(t--)
    {
        long long n;
        scanf("%lld",&n);
        printf("%lld\n",ans[n]);
    }
	// your code goes here
	return 0;
}
