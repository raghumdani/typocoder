#include<bits/stdc++.h>
using namespace std;

int a[100002];

int main()
{
	int n,i,sum1=0,sum2=0;
	scanf("%d",&n);
	
	for(i=0;i<n;i++)
	{
		scanf("%d",&a[i]);
		if(i)
		{
			sum1+=((n-i)*a[i]);
		}
		else
			sum1=n*a[i];
	}
	
	sort(a,a+n);
	
	for(i=0;i<n;i++)
	{
		if(i)
		{
			sum2+=((n-i)*a[i]);
		}
		else
			sum2=n*a[i];
	}
	
	printf("%d\n",sum1-sum2);
	
	return 0;
}