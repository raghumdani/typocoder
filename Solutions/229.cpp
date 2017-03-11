#include <iostream>
#include <algorithm>
#include <utility>
using namespace std;

int main() {
	int n,temp,power,ans=0,flag=0,i,temp1,power1,ans2=0;
	scanf("%d",&n);
	int a[1000008]={0};
	pair<int,int> p[n];
	for(i=0;i<1000008;i++)
	{
		a[i]=0;
	}
	for(i=0;i<n;i++)
	{
		scanf("%d %d",&temp,&power);
		p[i].first=temp;
		p[i].second=power;
		a[temp]=power;
	}
	sort(p,p+n);
	temp=p[n-1].first;
	power=p[n-1].second;
	temp1=p[n-2].first;
	power1=p[n-2].second;
	if(n==1)
	{
		ans=0;
	}
	else
	{
		flag=0;
		for(i=temp-1;i>=0;i--)
		{
			if((power!=0)&&(flag==0))
			{
				if(a[i]!=0)
				{
					ans++;
				}
				power--;
			}
			else if(power==0)
			{
				flag=1;
				if(a[i]!=0)
				{
					power=a[i];
					flag=0;
				}
			}
			if((flag==1)&&(a[i]!=0))
			{
				power=a[i];
				flag=0;
			}
		}
		flag=0;
		for(i=temp1-1;i>=0;i--)
		{
			if((power1!=0)&&(flag==0))
			{
				if(a[i]!=0)
				{
					ans2++;
				}
				power1--;
			}
			else if(power1==0)
			{
				flag=1;
				if(a[i]!=0)
				{
					power=a[i];
					flag=0;
				}
			}
			if((flag==1)&&(a[i]!=0))
			{
				power1=a[i];
				flag=0;
			}
		}
	}
	ans2=min(ans2+1,ans);
	printf("%d\n",ans2);
	return 0;
}