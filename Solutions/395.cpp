#include <stdio.h>
int main() { 
    long int t,i,mul;
    long long int n;
    scanf("%ld",&t);
    for(i=1;i<=t;i++)
    {
        mul=1;
        scanf("%lld",&n);
        while(n>0)
        {
            mul*=n%10;
            n/=10;
        }
        printf("%ld\n",mul);
    }
	return(0);
}