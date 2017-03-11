#include <stdio.h> 


int main() {
	int i,j,t,n;
	int a[100007]={0};
	a[1]=1;
	for(i=2;i<100007;i++)
	{
		if(a[i]==0)
		{
			for(j=i*2;j<100007;j+=i)
			{
				a[j]=1;
			}
		}
	}
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d",&n);
		if(a[n]==0)
		{
			printf("YES\n");
		}
		else
		{
			printf("NO\n");
		}
	}
	return 0;
}