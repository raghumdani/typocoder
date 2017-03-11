#include <stdio.h>

int main(void) {
	long int n,p=1,i,r;
	scanf("%ld",&n);
	long int a[n];
	for(i=0;i<n;i++)
	scanf("%ld",&a[i]);
	for(i=0;i<n;i++)
	{
	    while(a[i]!=0)
	    {r=a[i]%10;
	    p=p*r;
	    a[i]=a[i]/10;}
	    printf("\n%ld",r);
	}
	return 0;
	
}
