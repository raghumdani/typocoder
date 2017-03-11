#include<bits/stdc++.h>
using namespace std;

int main()
{
	int T;
	scanf("%d",&T);
	
	while(T--)
	{
		string s;
		long long int i,l,ans=1;
		
		cin>>s;
		
		l=(long long)s.length();
		
		for(i=0;i<l;i++)
		{
			ans=ans*(s[i]-'0');	
		}
		printf("%lld\n",ans);	
	}
	
	return 0;
}