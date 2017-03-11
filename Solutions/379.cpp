#include<bits/stdc++.h>
using namespace std;
int a[100005];
int main()
{
	int n,ans1=0,i,ans2=0;
	scanf("%d",&n);
	for(i=0;i<n;i++)
	{
		scanf("%d",&a[i]);
		ans1+=(a[i]*(n-i));
	}
	sort(a,a+n);
	for(i=0;i<n;i++)
	{
		ans2+=(a[i]*(n-i));	
	}
	printf("%d\n",ans1-ans2);
	return 0;
}