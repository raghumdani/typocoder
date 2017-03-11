#include<bits/stdc++.h>
#include<cmath>
using namespace std;
int main()
{
	int n;
	cin>>n;
	std::vector<int> v;
	std::vector<int> visited;
	std::vector<int> in;
	for (int i = 0; i < n; ++i)
	{
		int k;
		cin>>k;
		v.push_back(k);
		visited.push_back(0);
		in.push_back(0);
	}

	set<int> s;
	int i=0;
	int sum=0;
	int time=0;
	while(s.empty()!=true||visited[i]!=1)
	{
		//cout<<s.empty()<<"a"<<endl;
		if(s.empty()!=true)
		{
			while(s.empty()!=true&&*s.begin()<=v[i])
			{
				sum=sum+time-in[*s.begin()];
				s.erase(*s.begin());
			}
		}

		if(visited[i]==0)
			{s.insert(v[i]);
				in[v[i]]=time;
			}
		else if(s.empty())
		{
			break;
		}
		visited[i]=1;
		time++;
		i=(i+1)%n;

	}

	cout<<sum;
}