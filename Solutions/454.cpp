#include<bits/stdc++.h>
using namespace std;

pair<int,int> A[100005];

set<int>ok;

int main()
{
	int N;
	scanf("%d",&N);
	
	int i;
	
	for (i=1;i<=N;i++)
	{
		scanf("%d",&A[i].first);
		A[i].second=i;
	}
	
	sort(A+1,A+N+1);
	reverse(A+1,A+N+1);
	
	int ans=N;
	ok.insert(A[1].second);
	
	for (i=2;i<=N;i++)
	{
		int pos=A[i].second;
		
		set<int>::iterator it=ok.upper_bound(pos);
		if(it==ok.end())
		{
			ans+=(N-pos)+*(ok.begin());
		}
		
		else
		{
			ans+=(*it)-pos;
		}
		
		ok.insert(pos);
	}
	cout<<ans;
}