#include <stdio.h> 

int main() { 
    unsigned long int n,prod;
    unsigned int t,d;
    scanf("%d",&t);
    while(t>0)
    {
        prod=1;
        scanf("%ld",&n);
        while(n>0)
        {
            d=n%10;
            prod*=d;
            n/=10;
        }
        printf("%ld\n",prod);
        t--;
    }
	return(0);
}