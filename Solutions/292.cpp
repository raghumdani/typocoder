#include <bits/stdc++.h>
using namespace std;

namespace PermAndComb
{
long long countFact(long long n, long long p)
{
    long long k=0;
    while (n>=p)
    {
        k+=n/p;
        n/=p;
    }
    return k;
}

/* This function calculates (a^b)%MOD */
long long pow(long long a, long long b, long long MOD)
{
    long long x=1,y=a;
    while(b > 0)
    {
        if(b%2 == 1)
        {
            x=(x*y);
            if(x>MOD) x%=MOD;
        }
        y = (y*y);
        if(y>MOD) y%=MOD;
        b /= 2;
    }
    return x;
}

/*  Modular Multiplicative Inverse
    Using Euler's Theorem
    a^(phi(m)) = 1 (mod m)
    a^(-1) = a^(m-2) (mod m) */
long long InverseEuler(long long n, long long MOD)
{
    return pow(n,MOD-2,MOD);
}

long long factMOD(long long n, long long MOD)
{
    long long res = 1;
    while (n > 0)
    {
        for (long long i=2, m=n%MOD; i<=m; i++)
            res = (res * i) % MOD;
        if ((n/=MOD)%2 > 0)
            res = MOD - res;
    }
    return res;
}

long long nCr(long long n, long long r, long long MOD)
{
    if(n<r)
        return 0;
    if(n==r)
        return 1;
    if (countFact(n, MOD) > countFact(r, MOD) + countFact(n-r, MOD))
        return 0;

    return (factMOD(n, MOD) *
            ((InverseEuler(factMOD(r, MOD), MOD) *
            InverseEuler(factMOD(n-r, MOD), MOD)) % MOD)) % MOD;
}
long long nPr(long long n, long long r, long long MOD)
{
    if (countFact(n, MOD) > countFact(r, MOD) + countFact(n-r, MOD))
        return 0;

    return (factMOD(n, MOD) *
            InverseEuler(factMOD(n-r, MOD), MOD) % MOD) % MOD;
}
}
using namespace PermAndComb;

long long pow(long long n,long long k)
{
    long long p=1,i;
    for(i=1;i<=k;i++)
        p=(p*n)%1000000007;
    p=p%1000000007;
    return p;
}
long long lg2(long long n)
{
    long long ctr=1;
    while(n)
    {
        n=n>>1;
        ctr++;
    }
    return (ctr-1);
}
int main()
{
    int T;
    long long N,K,ans;
    scanf("%d",&T);
    while(T--)
    {
        ans=0;
        scanf("%lld %lld",&N,&K);
        long long m=lg2(N);
        if(K>m)
            ans=0;
        else
        {
            ans=nPr(m,K,1000000007);
            if(m>K)
                ans=(ans*pow(K,(m-K)))%1000000007;
        }
        printf("%lld\n",ans);
    }
}

