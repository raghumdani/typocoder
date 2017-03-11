#include <stdio.h> 

int main() { 
	int T,n,prod,r;
	scanf("%d",&T);
	while(T--)
	{
	    prod=1;
	    scanf("%d",&n);
	    while(n!=0)
	    {
	        r=n%10;
	        prod*=r;
	        n=n/10;
	    }
	    printf("%d\n",prod);
	}
	
}