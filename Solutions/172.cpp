#include <iostream>
#include <algorithm>
using namespace std;

int main() {
	int t,n,i,j,ans,temp;
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d",&n);
		ans=1;
		int a[n];
		for(i=0;i<n;i++)
		{
			scanf("%d",&a[i]);
		}
		sort(a,a+n);
		for(i=0;i<n;i++)
		{
			temp=a[i];
			for(j=i+1;j<n;j++)
			{	
				if(a[j]%temp==0)
				{
					ans=temp;
				}
			}
		}
		printf("%d\n",ans);
	}
	return 0;
}