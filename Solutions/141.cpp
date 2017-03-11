#include <stdio.h> 

int main() {
	int i,j,t,n,count=0;
	int a[1000007]={0};
	a[1]=0;
	for(i=2;i<1000007;i++)
	{
		if(a[i]==0)
		{
			for(j=i*2;j<1000007;j+=i)
			{
				a[j]=-1;
			}
			count++;
			a[i]=count;
		}
	}
	count=1;
	for(i=2;i<1000007;i++)
	{
		if(a[i]>count)
		{
			count=a[i];
		}
		else 
		{
			a[i]=count;
		}
	}
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d",&n);
		printf("%d\n",a[n]);
	}
	return 0;
}