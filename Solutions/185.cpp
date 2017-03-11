#include <stdio.h>
#include <math.h>

int phi(int);
int main()
{
    long int T,A,B,C,M,i,newPow;
    scanf("%d",&T);
    for(i=1;i<=T;i++)
    {
        scanf("%ld %ld %ld %ld",&A,&B,&C,&M);
        newPow=((long int)pow(B,C)%phi(M));
        printf("%d\n",(long int)pow(A,newPow)%M);
    }
}
int phi(int n)
{
    int result = n,p;
    for (p=2; p*p<=n; ++p)
    {
        if (n % p == 0)
        {
            while (n % p == 0)
                n /= p;
            result -= result / p;
        }
    }
    if (n > 1)
        result -= result / n;
    return result;
}