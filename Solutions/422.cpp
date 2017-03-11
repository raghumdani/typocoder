#include<bits/stdc++.h>
using namespace std;

int main()
{
	int T;
	cin>>T;
	
	while(T--)
	{
		long long N;
		cin>>N;
		
		int cur=0,cnt=0;
		long long tot=0,two=1;
		
		while(tot<N)
		{
			tot+=two;
			two*=2;
			cnt++;
			cur=(cur+1)%3;
		}
		
		if(cur)
		printf("Alice\n");
		
		else printf("Bob\n");
		
	}
	
}