#include<bits/stdc++.h>
using namespace std;
int a[1000];
char b[20];
int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		memset(a,0,sizeof(a));
		scanf("%s",b);
		int l=strlen(b),i,tans=0;
		sort(b,b+l);
		tans=0;
			for(i=0;i<l;i++)
			{
				tans+=((l-i)*(b[i]-'0'));
			}
			a[tans]++;
		while(next_permutation(b,b+l))
		{
			tans=0;
			for(i=0;i<l;i++)
			{
				tans+=((l-i)*(b[i]-'0'));
			}
			a[tans]++;
		}
		tans=0;
		for(i=0;i<800;i++)
		{
			if(a[i]>tans)
			{
				tans=a[i];
			}
		}
		
		printf("%d\n",tans);
	}
	return 0;
}