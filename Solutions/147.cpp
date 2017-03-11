#include <stdio.h> 
int gcd(int a, int b)
{
	int rem;
	while(a%b!=0)
	{
		rem=a%b;
		a=b;
		b=rem;
	}
	return b;
}


int main() {
	int t,max,i,j,n,temp;
	scanf("%d",&t);
	while(t--)
	{
		max=0;
		scanf("%d",&n);
		int a[n];
		for(i=0;i<n;i++)
		{
			scanf("%d",&a[i]);
		}
		for(i=0;i<n;i++)
		{
			for(j=i+1;j<n;j++)
			{
				temp=gcd(a[i],a[j]);
				if(temp>max)
				{
					max=temp;
				}
			}
		}
		printf("%d\n",max);
	}
	return 0;
}