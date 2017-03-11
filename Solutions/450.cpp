#include<bits/stdc++.h>
using namespace std;

int calculate(string x,int n)
{
	int i,ans=0;
	
	for(i=0;i<n;i++)
	{
		ans += (i+1)*(x[i]-'0');
	}
	return ans;
}

int main()
{
	int T;
	scanf("%d",&T);
	
	while(T--)
	{
		string s;
		int l,temp,ans=0;
		map<int,int> m;
		cin>>s;
		
		l=s.length();
		
		sort(s.begin(),s.end());
		do
		{
			temp = calculate(s,l);
			if(m.find(temp) == m.end())
				m.insert({temp,1});
			else
				m[temp]+=1;
			
			ans=max(ans,m[temp]);	
			
			//cout<<s<<" "<<temp<<"\n";	
		}while(next_permutation(s.begin(),s.end()));
		
		printf("%d\n",ans);
	}
	
	return 0;
}