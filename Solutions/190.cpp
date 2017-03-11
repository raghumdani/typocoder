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
    while(t--)
    {
        long long n,ans=0;
        scanf("%lld",&n);
        
        for(long long i=2;i<=n;i++)
        {
            if(prime[i])
            ans++;
        }
        printf("%lld\n",ans);
    }
	// your code goes here
	return 0;
}
