#include <bits/stdc++.h>
#define MAX 1000006
using namespace std;




int main()
{
	int f[26];
	int sum=0;
	for(int i=0;i<26;i++)
	{
		scanf("%d",&f[i]);
		sum+=f[i];
	}
	int odd=0;
	int eve=0;
	char ans[sum+10];
	for(int i=0;i<26;i++)
	{
		if(f[i]%2==1){
			odd++;
		}
		else
		{
			eve++;
		}
	}
	if(sum==0)
	{
		printf("");
		return 0;
	}
	if(odd>1)
	{
		cout<<"-1";
	}
	else
	{
		if(odd==1)
		{
			char oddchar;
			for(int i=0;i<26;i++)
			{
				if(f[i]%2==1)
				{
					oddchar = i+'a';
				}
			}
			ans[sum/2] = oddchar;
			int front = 0;
			int back = sum-1;
			for(int i=0;i<26;i++)
			{
				if(f[i]>0 && f[i]%2==0)
				{
					int x=f[i]/2;
					for(int j=0;j<x;j++)
					{
						ans[front++] = i+'a';
						ans[back--] = i+'a';
					}
				}
			}
			ans[sum] = '\0';
			printf("%s\n",ans);
		}
		else
		{
			int front = 0;
			int back = sum-1;
			for(int i=0;i<26;i++)
			{
				if(f[i]>0 && f[i]%2==0)
				{
					int x=f[i]/2;
					for(int j=0;j<x;j++)
					{
						ans[front++] = i+'a';
						ans[back--] = i+'a';
					}
				}
			}
			ans[sum] = '\0';
			printf("%s\n",ans);
		}
	}

	return 0;

	
}