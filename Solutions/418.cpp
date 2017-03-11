#include <stdio.h>

int main(void) {
	 int n,p=1,i,r;
	scanf("%d",&n);
	 int a[n];
	for(i=0;i<n;i++)
	scanf("%d",&a[i]);
	for(i=0;i<n;i++)
	{p=1;
	    while(a[i]!=0)
	    {r=a[i]%10;
	    p=p*r;
	    a[i]=a[i]/10;}
	    printf("\n%d",p);
	}
	return 0;
	
}
