#include <stdio.h> 

int main() { 
    int t;
    scanf("%d",&t);
    while(t--){
                long long int n,product=1;
                scanf("%lld",&n);
                while(n>0)
                {
                    product*=(n%10);
                    if(product==0)
                        break;
                    n=n/10;
                }
    
    printf("%lld\n",product);
    }
	return(0);
}